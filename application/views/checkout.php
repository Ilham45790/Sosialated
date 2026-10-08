<div class="container" style="margin-top: 100px">
    <h3>Check Out</h3>
    <table class="table table-bordered table-sm text-center table-responsive">
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($keranjang as $item): ?>
                <?php $subtotal = $item['jumlah'] * $item['harga'] ?>
                <?php $total+=$subtotal ?>
                    <tr>
                        <td>
                            <img src="<?php echo $this->config->item('url_catalog') . $item['gambar_catalog']; ?>" class="card-img-top" alt="catalog Image" style="height: 100px; object-fit: cover;">
                            <p class="mt-3"><?php echo $item['nama_catalog']; ?></p>

                        </td>

                        <td><?php echo number_format($item['harga'], 2); ?></td>
                        <td><?php echo $item['jumlah']; ?></td>
                        <td><?php echo number_format(floatval($item['harga']) * intval($item['jumlah']), 2); ?></td>
                        <td><?php echo number_format($subtotal) ?></td>
                    </tr>
                    <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th><?php echo number_format($total) ?></th>
            </tr>
        </tfoot>
    </table>

    <button type="button" id="pay-button" class="btn btn-primary px-5">Bayar Sekarang</button>
    <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>

    <?php 
    include 'midtrans-php/Midtrans.php';

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-tnkwB4GJ563obIhhTsR3UmNz';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params['transaction_details']['order_id'] = rand();
    $params['transaction_details']['gross_amount'] = $total;

    $snapToken = "";

    try {
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    } catch (Exception $e) {
        
    }

    ?>
</div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FvBtfb0wg_6n8bA1"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?php echo $snapToken?>', {
          // Optional
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>