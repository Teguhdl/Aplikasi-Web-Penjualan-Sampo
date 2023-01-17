<div class="main-content">
        <section class="section">
          <div class="section-header">
          <h1 class="h2"><?= esc($title) ?></h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?=base_url('menu/view')?>">Master Data</a></div>
              <div class="breadcrumb-item"><a href="<?=base_url('penjualan/view')?>">Transaksi</a></div>
            </div>
          </div>

      <div class="alert alert-success" role="alert">
          <?php 
            $session = session();
            echo "Selamat datang ".$session->get('user_name');
          ?>
      </div>
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"> 
      <div class="card-body">
      <form class="row g-3 needs-validation" action="<?=base_url('Laporan')?>" method="post"
        novalidate>
<div class="container-fluid mb-3">
<table class="table table-bordered">
    <tr><td>
    <div class="form-group row">
                  <label for="tgl_awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_awal" name="tanggal1"  >
                    <div class="invalid-feedback" id="errortgl_jual"></div>            
                  </div>
                </div>   
                <div class="form-group row">
                  <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_akhir" name="tanggal2"  >
                    <div class="invalid-feedback" id="errortgl_jual"></div>            
                  </div>
                </div>   
</td></tr>
    <tr><td>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">Proses</button>
    </td></tr>
</table>
</form>
    <table border="1">
        <style>
            table, th, td {
                border: 2px solid black;
            }
        </style>
    <tr><td  colspan="5" align="center">Jurnal Umum</td></tr>
    <tr><td  colspan="5" align="center">Kopinus</td></tr>
        <tr>
            <td  align="center" width="160">Tanggal</td>
            <td  align="center" width="300">Keterangan</td>
            <td  align="center" width="100">Ref</td>
            <td  align="center" width="210">Debet</td>
            <td  align="center" width="210">Kredit</td>
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