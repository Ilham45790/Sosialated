<?php
class MTransaksi extends CI_Model {

    // Properti baru untuk menyimpan jumlah total transaksi
    public $totalTransactions = 0;
    
    public $minSupport = 3; 
    public $minConfidence = 0.05;

    public function __construct() {
        parent::__construct();
    }

    public function tampil(){
        $id_customer = $this->session->userdata('id_customer');
        $this->db->where('id_customer', $id_customer);
        $this->db->order_by('tanggal_transaksi', 'desc');
        return $this->db->get('transaksi')->result_array();
    }

    public function get_total_from_db($id_customer) {
        $this->db->select_sum('total');
        $this->db->where('id_customer', $id_customer);
        $query = $this->db->get('transaksi');
        return $query->num_rows() > 0 ? $query->row()->total : 0;
    }

    public function simpan_detail_transaksi($data) {
        $this->db->insert('transaksi', $data);
    }

    public function detail($id_transaksi) {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
    }

    public function set_lunas($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->set('status_pembayaran', 'success');
        $this->db->update('transaksi');
    }

    public function getTransactions() {
        $transactions = [];
        $query = $this->db->query("SELECT detail_transaksi FROM transaksi WHERE status_pembayaran = 'success'");
        
        foreach ($query->result_array() as $row) {
            $transactionItems = [];
            $details = json_decode($row['detail_transaksi'], true);
            
            if (is_array($details)) {
                foreach ($details as $item) {
                    if (isset($item['nama_catalog'])) {
                        $transactionItems[] = strtolower($item['nama_catalog']);
                    }
                }
            }
            
            if (!empty($transactionItems)) {
                $transactions[] = array_unique($transactionItems);
            }
        }
        
        return $transactions;
    }

    public function getSupportCount($itemset, $transactions) {
        $count = 0;
        foreach ($transactions as $trx) {
            if (count(array_intersect($itemset, $trx)) === count($itemset)) {
                $count++;
            }
        }
        return $count;
    }

    public function generateItemsets($items, $k) {
        $results = [];
        $items = array_values(array_unique($items));
        $n = count($items);
        
        $recurse = function($start, $curr) use (&$recurse, &$results, $items, $n, $k) {
            if (count($curr) == $k) {
                $results[] = $curr;
                return;
            }
            for ($i = $start; $i < $n; $i++) {
                $recurse($i + 1, array_merge($curr, [$items[$i]]));
            }
        };

        $recurse(0, []);
        return $results;
    }

    public function runApriori() {
        $transactionList = $this->getTransactions();
        $this->totalTransactions = count($transactionList);

        $supportData = [];
        $frequentItemsets = [];
        $allItems = [];

        foreach ($transactionList as $trx) {
            $allItems = array_merge($allItems, $trx);
        }
        $allItems = array_unique($allItems);

        $itemsets = [];
        foreach ($allItems as $item) {
            $count = $this->getSupportCount([$item], $transactionList);
            if ($count >= $this->minSupport) {
                $supportData[json_encode([$item])] = $count;
                $itemsets[] = [$item];
            }
        }
        $frequentItemsets = $itemsets;

        $k = 2;
        $maxItemsetlength = 2;

        while (!empty($itemsets) && $k <= $maxItemsetlength) {
            $candidateItemsets = [];
            $itemsFlat = [];
            foreach ($itemsets as $set) {
                $itemsFlat = array_merge($itemsFlat, $set);
            }
            
            $candidateItemsets = $this->generateItemsets(array_unique($itemsFlat), $k);

            $nextItemsets = [];
            foreach ($candidateItemsets as $candidate) {
                $count = $this->getSupportCount($candidate, $transactionList);
                if ($count >= $this->minSupport) {
                    $supportData[json_encode($candidate)] = $count;
                    $nextItemsets[] = $candidate;
                }
            }

            if (!empty($nextItemsets)) {
                $frequentItemsets = array_merge($frequentItemsets, $nextItemsets);
                $itemsets = $nextItemsets;
                $k++;
            } else {
                break;
            }
        }
        return ['supportData' => $supportData, 'transactions' => $transactionList];
    }

    public function getAssociationRules($supportData, $transactions) {
        $rules = [];
        $totalTransactions = count($transactions);

        foreach ($supportData as $itemJson => $count) {
            $itemset = json_decode($itemJson);
            if (count($itemset) < 2) continue;

            $totalSupportCount = $count;
            $itemsetSupport = $totalSupportCount / $totalTransactions;

            $subsetGen = function ($set) {
                $result = [];
                $count = count($set);
                $n = 1 << $count;
                for ($i = 1; $i < $n - 1; $i++) {
                    $subset = [];
                    for ($j = 0; $j < $count; $j++) {
                        if ($i & (1 << $j)) $subset[] = $set[$j];
                    }
                    $result[] = $subset;
                }
                return $result;
            };

            foreach ($subsetGen($itemset) as $antecedent) {
                $consequent = array_values(array_diff($itemset, $antecedent));
                $anteCount = $supportData[json_encode(array_values($antecedent))] ?? 0;
                $consequentCount = $supportData[json_encode(array_values($consequent))] ?? 0;
                
                if ($anteCount == 0 || $consequentCount == 0) continue;

                $confidence = $totalSupportCount / $anteCount;
                $consequentSupport = $consequentCount / $totalTransactions;
                $lift = $confidence / $consequentSupport;
                
                if ($confidence >= $this->minConfidence) {
                    $rules[] = [
                        'antecedent' => $antecedent,
                        'consequent' => $consequent,
                        'confidence' => $confidence,
                        'support' => $itemsetSupport,
                        'lift' => $lift
                    ];
                }
            }
        }
        return $rules;
    }
}