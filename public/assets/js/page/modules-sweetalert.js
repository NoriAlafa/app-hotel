"use strict";

const flashData = $('.flash-data').data('flashdata');
const flashDataAdmin = $('.flash-data-admin').data('flashdata');
const flashDataRes = $('.flash-data-resep').data('flashdata');
const flashDataKamar = $('.flash-data-kamar').data('flashdata');
const flashDataFas = $('.flash-data-fasilitas').data('flashdata');


if(flashData){
  swal({
    title:'Berhasil' ,
    text:'Data.....' + flashData,
    icon:'success'
  });
}

if(flashDataFas){
  swal({
    title:'Berhasil' ,
    text:'Fasilitas.....' + flashDataFas,
    icon:'success'
  });
}

if(flashDataAdmin){
  swal({
    title:'Gagal' ,
    text:'Oops    ' + flashDataAdmin,
    icon:'error'
  });
}

if(flashDataKamar){
  swal({
    title:'Berhasil' ,
    text:'Yeay    ' + flashDataKamar,
    icon:'success'
  });
}



if(flashDataRes){
  swal({
    title:'Gagal' ,
    text:'Oops    ' + flashDataRes,
    icon:'error'
  });
}



$("#swal-6").click(function() {
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Poof! Your imaginary file has been deleted!', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

$("#swal-7").click(function() {
  swal({
    title: 'What is your name?',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Type your name',
      type: 'text',
    },
    },
  }).then((data) => {
    swal('Hello, ' + data + '!');
  });
});



$('.tombol-hapus').click(function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      document.location.href=href;
      swal('Poof! Berhasil dihapus', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

$('.fas-hapus').click(function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      document.location.href=href;
      swal('Poof! Berhasil dihapus', {
        icon: 'success',
      });
      } else {
      swal('Fasilitas tidak jadi terhapus');
      }
    });
});