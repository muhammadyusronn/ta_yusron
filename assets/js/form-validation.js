(function($) {
  'use strict';
  // $.validator.setDefaults({
  //   submitHandler: function() {
  //     alert("submitted!");
  //   }
  // });
  $(function() {
    // validate the comment form when it is submitted
    $("#commentForm").validate({
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // Form Validation for user
    $("#user-create").validate({
      rules: {
        nip: {
          required: true,
          minlength: 2
        },
        nama:{
          required: true,
          minlength: 2
        },
        kontak: {
          required: true,
          minlength: 5
        },
      },
      messages: {
        nip: {
          required: "Masukan NIP Anda",
          minlength: "NIP minimal 2 karakter"
        },
        nama: {
          required: "Masukan Nama Anda",
          minlength: "Nama minimal 2 karakter"
        },
        kontak: {
          required: "Masukan Kontak Anda",
          minlength: "Kontak minimal 5 karakter"
        },
        
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // Form Validation for jabatan
    $("#kategori-create").validate({
      rules: {
        namakategori: {
          required: true,
          minlength: 2
        },
        deksripsikategori:{
          required: true,
          minlength: 2
        }
      },
      messages: {
        namakategori: {
          required: "Masukan Nama Kategori",
          minlength: "Nama Kategori minimal 2 karakter"
        },
        deksripsikategori: {
          required: "Masukan Deksripsi Kategori",
          minlength: "Deksripsi Kategori minimal 2 karakter"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // Form Validation for gedung
    $("#gedung-create").validate({
      rules: {
        kodegedung: {
          required: true,
          minlength: 2
        },
        namagedung: {
          required: true,
          minlength: 2
        },
        alamat:{
          required: true,
          minlength: 2
        }
      },
      messages: {
         namagedung: {
          required: "Masukan Nama Gedung",
          minlength: "Nama Gedung minimal 2 karakter"
        },
        kodegedung: {
          required: "Masukan Kode Gedung",
          minlength: "Kode Gedung minimal 2 karakter"
        },
        alamat: {
          required: "Masukan Alamat Gedung",
          minlength: "Alamat Gedung minimal 2 karakter"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // Form Validation for ruangan
    $("#ruangan-create").validate({
      rules: {
        koderuangan: {
          required: true,
          minlength: 2
        },
        namaruangan: {
          required: true,
          minlength: 2
        },
        lokasi:{
          required: true,
          minlength: 2
        },
        deskripsiruangan:{
          required: true,
          minlength: 2
        }
      },
      messages: {
         namaruangan: {
          required: "Masukan Nama Ruangan",
          minlength: "Nama Ruangan minimal 2 karakter"
        },
        koderuangan: {
          required: "Masukan Kode Ruangan",
          minlength: "Kode Ruangan minimal 2 karakter"
        },
        deskripsiruangan: {
          required: "Masukan Deskripsi Ruangan",
          minlength: "Deskripsi Ruangan minimal 2 karakter"
        },
        lokasi: {
          required: "Masukan Lokasi Ruangan",
          minlength: "Lokasi Ruangan minimal 2 karakter"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // Form Validation for pegawai
    $("#pegawai-create").validate({
      rules: {
        nip: {
          required: true,
          minlength: 2
        },
        nama: {
          required: true,
          minlength: 2
        },
        jabatan:{
          required: true,
        },
        kontak:{
          required: true,
          minlength: 2
        }
      },
      messages: {
         nama: {
          required: "Masukan Nama Pegawai"
        },
        nip: {
          required: "Masukan NIP Pegawai",
          minlength: "NIP Pegawai minimal 2 karakter"
        },
        kontak: {
          required: "Masukan Kontak Pegawai",
          minlength: "Kontak Pegawai minimal 2 karakter"
        },
        jabatan: {
          required: "Masukan Jabatan Pegawai",
          minlength: "Jabatan Pegawai minimal 2 karakter"
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
    // propose username by combining first- and lastname
    $("#username").focus(function() {
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      if (firstname && lastname && !this.value) {
        this.value = firstname + "." + lastname;
      }
    });
    //code to hide topic selection, disable for demo
    var newsletter = $("#newsletter");
    // newsletter topics are optional, hide at first
    var inital = newsletter.is(":checked");
    var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
    var topicInputs = topics.find("input").attr("disabled", !inital);
    // show when newsletter is checked
    newsletter.on("click", function() {
      topics[this.checked ? "removeClass" : "addClass"]("gray");
      topicInputs.attr("disabled", !this.checked);
    });
  });
})(jQuery);