<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
             
              <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('penjualan/view')?>">Transaksi</a></div>
            </div>
          </div>



          <form>
  <div class="container-fluid mb-3">
    
    <table border="1">
        <style>
            table, th, td {
                border: 2px solid black;
            }
        </style>
    <tr><td style="color:#000000;" bgcolor="#8A2BE2" colspan="5" align="center">Jurnal Umum</td></tr>
    <tr><td style="color:#000000;" bgcolor="#8A2BE2" colspan="5" align="center">Kopinus</td></tr>
        <tr>
            <td style="color:#000000;" bgcolor="#FF00FF" align="center" width="160">Tanggal</td>
            <td style="color:#000000;" bgcolor="#FF00FF" align="center" width="300">Keterangan</td>
            <td style="color:#000000;" bgcolor="#FF00FF" align="center" width="100">Ref</td>
            <td style="color:#000000;" bgcolor="#FF00FF" align="center" width="210">Debet</td>
            <td style="color:#000000;" bgcolor="#FF00FF" align="center" width="210">Kredit</td>
        </tr>
        <?php foreach ($data as $row): ?>
            <?php if($row["posisi_d_c"]=="Debet"): ?>
            <tr>
            <td style="color:#000000;" bgcolor="#DCDCDC" align="center"><?= $row["tgl_jurnal"]; ?></td>
            <td style="color:#000000;" bgcolor="#DCDCDC"><?= $row["nama_akun"]; ?></td>
            <td style="color:#000000;" bgcolor="#DCDCDC" align="center"><?= $row["kode_akun"]; ?></td>
            <td align= "right" style="color:#000000;" bgcolor="#DCDCDC"><?= format_rupiah($row["nominal"]); ?></td>
            <td style="color:#000000;" bgcolor="#DCDCDC"></td>
            </tr>
            <?php elseif ($row["posisi_d_c"]=="Kredit"): ?>
                <tr>
            <td></td>
            <td align="center"><?= $row["nama_akun"]; ?></td>
            <td align="center"><?= $row["kode_akun"]; ?></td>
            <td></td>
            <td align= "right"><?= format_rupiah($row["nominal"]); ?></td>
            </tr>
            <?php endif;?>
        <?php endforeach;?>
    </table><br>
    <input class="btn btn-sm btn-primary" type="button" value="Kembali" onclick="javascript:history.go(-1);"/>
</body>
</div>
</div>
          </div>
</html>