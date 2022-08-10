<!-- include header -->
<?= $this->include('template/Headertemplate'); ?>
<!-- akhir include header -->

<!-- Side Bar -->
<?= $this->include('template/Sidebartemplate'); ?>
<!-- Akhir Side Bar -->

<!-- Tempat Konten yang berbeda-beda akan diisi dari halaman yang memanggilnya -->
<?= $this->renderSection('konten'); ?>
<!-- Akhir Tempat Konten yang berbeda-beda -->

<!-- Footer -->
<?= $this->include('template/Footertemplate'); ?>
<!-- Akhir Footer -->