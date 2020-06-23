$(document).ready(function () {

  //hilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword ditulis
  $('#keyword-cari').on('keyup', function () {
    $('#data-table').load('ajax/table.php?keyword-cari=' + $('#keyword-cari').val());
  });

});