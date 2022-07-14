  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bower_components/PACE/pace.min.js"></script>

  <script>
     ;
     (function($) {
        $.fn.extend({
           donetyping: function(callback, timeout) {
              timeout = timeout || 1e3; // 1 second default timeout
              var timeoutReference,
                 doneTyping = function(el) {
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                 };
              return this.each(function(i, el) {
                 var $el = $(el);

                 $el.is(':input') && $el.on('keyup keypress paste', function(e) {

                    if (e.type == 'keyup' && e.keyCode != 8) return;


                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function() {

                       doneTyping(el);
                    }, timeout);
                 }).on('blur', function() {
                    doneTyping(el);
                 });
              });
           }
        });
     })(jQuery);

     function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
           split = number_string.split(','),
           sisa = split[0].length % 3,
           rupiah = split[0].substr(0, sisa),
           ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
           separator = sisa ? '.' : '';
           rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
     }
     $('#hasil').hide();
     $('#oke').change(function() {
        var inputUrl = $('#oke').val();
        var type = '';
        if (inputUrl == '' || inputUrl == null) {

        } else {
           $.ajax({
              url: "<?php echo base_url(); ?>home/scan",
              method: "POST",
              dataType: 'json',
              data: {
                 data: inputUrl
              },
              success: function(data) {

                 $.ajax({
                    url: "<?php echo base_url(); ?>home/checkNoFaktur",
                    method: "POST",
                    dataType: 'text',
                    data: {
                       nofaktur: data['nomorFaktur']
                    },
                    success: function(out) {
                       if (out == '200') {
                          console.log(data);
                          $('#oke').val('');
                          $('#oke').prop('disabled', false);
                          $('#oke').focus();
                          $('#tglFaktur').text(data['tanggalFaktur']);
                          $('#nmPen').text(data['namaPenjual']);
                          $('#almPen').text(data['alamatPenjual']);
                          $('#npwpPen').text(data['npwpPenjual']);
                          $('#nmPem').text(data['namaLawanTransaksi']);
                          $('#almPem').text(data['alamatLawanTransaksi']);
                          $('#npwpPem').text(data['npwpLawanTransaksi']);
                          $('#noFaktur').text(data['nomorFaktur']);
                          if (data['detailTransaksi'].length == undefined) {
                             type = 'singleAssoc';
                             $("#tbl tbody").empty();
                             $("#tbl tbody").append(
                                '<tr>' +
                                '<td><h4>' + data['detailTransaksi']['nama'] + '<br>(Rp.' + formatRupiah(data['detailTransaksi']['hargaSatuan'].toString(), 'Rp. ') + 'x' + data['detailTransaksi']['jumlahBarang'] + ')</h4></td>' +
                                '<td><h4>:Rp.</h4></td>' +
                                '<td align="right"><h4>' + formatRupiah(data['detailTransaksi']['hargaTotal'], 'Rp. ') + '</h4></td>' +
                                '</tr>'
                             );
                             $('#hjl').text(formatRupiah(data['detailTransaksi']['hargaTotal'], 'Rp. '));
                             $('#potonganHarga').text(formatRupiah(data['detailTransaksi']['diskon'], 'Rp. '));
                             $('#dsrPegenaanPajak').text(formatRupiah(data['jumlahDpp'], 'Rp. '));
                             $('#ppn').text(formatRupiah(data['jumlahPpn'], 'Rp. '));
                             $('#total').text(formatRupiah(data['jumlahPpnBm'], 'Rp. '));
                          } else {
                             type = 'multiAssoc';
                             var totalDiskon = 0;
                             var hargaTotal = 0;
                             var i;
                             $("#tbl tbody").empty();
                             for (i = 0; i < data['detailTransaksi'].length; i++) {
                                totalDiskon = totalDiskon + parseInt(data['detailTransaksi'][i]['diskon']);
                                hargaTotal = hargaTotal + parseInt(data['detailTransaksi'][i]['hargaTotal']);
                                $("#tbl tbody").append(
                                   '<tr>' +
                                   '<td><h4>' + data['detailTransaksi'][i]['nama'] + '<br>(Rp.' + formatRupiah(data['detailTransaksi'][i]['hargaSatuan'].toString(), 'Rp. ') + 'x' + data['detailTransaksi'][i]['jumlahBarang'] + ')</h4></td>' +
                                   '<td><h4>:Rp.</h4></td>' +
                                   '<td align="right"><h4>' + formatRupiah(data['detailTransaksi'][i]['hargaTotal'], 'Rp. ') + '</h4></td>' +
                                   '</tr>'
                                );
                             }
                             $('#potonganHarga').text(formatRupiah(totalDiskon.toString(), 'Rp. '));
                             $('#hjl').text(formatRupiah(hargaTotal.toString(), 'Rp. '));
                             $('#dsrPegenaanPajak').text(formatRupiah(data['jumlahDpp'], 'Rp. '));
                             $('#ppn').text(formatRupiah(data['jumlahPpn'], 'Rp. '));
                             $('#total').text(formatRupiah(data['jumlahPpnBm'], 'Rp. '));


                          }

                          $('#hasil').show();
                          $('#selesai').show();

                          $.ajax({
                             url: "<?php echo base_url(); ?>home/insertFaktur",
                             method: "POST",
                             dataType: 'text',
                             data: {
                                data: inputUrl,
                                state: type,
                                diskon: totalDiskon,
                                total: hargaTotal
                             },
                             success: function(res) {
                                console.log(res);
                             },
                             error: function(jqXHR, textStatus, errorThrown) {
                                alert(textStatus);

                             }
                          });
                       } else {
                          alert('Faktur Ini Sudah Di Scan');
                          $('#oke').val('');
                          $('#oke').prop('disabled', false);
                          $('#oke').focus();
                       }

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       alert(textStatus);

                    }
                 });



              },
              error: function(jqXHR, textStatus, errorThrown) {
                 alert('Error Mohon Scan Ulang');
                 $('#oke').val('');
                 $('#oke').prop('disabled', false);
                 $('#oke').focus();
              }
           });

        }
     });

     $(document).ready(function() {
        $('#oke').focus();
        $('#selesai').hide();
        $('#hasil').hide();
     })

     $(document).ajaxStart(function() {
        $('#oke').prop('disabled', true);
        Pace.restart();
     });

     $('#selesai').click(function() {
        window.location.reload();
        $(this).hide();
     });

     //   $(document).ajaxComplete(function() {

     //   });
  </script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
  </body>

  </html>