"use strict";

const flashData = $('.flash-data').data('flashdata');
const flashDataAdmin = $('.flash-data-admin').data('flashdata');
const flashDataRes = $('.flash-data-resep').data('flashdata');

if(flashData){
  swal({
    title:'Berhasil' ,
    text:'Data.....' + flashData,
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

if(flashDataRes){
  swal({
    title:'Gagal' ,
    text:'Oops    ' + flashDataRes,
    icon:'error'
  });
}


$("#swal-1").click(function() {
	swal('Hello');
});

$("#swal-2").click(function() {
	swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function() {
	swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function() {
	swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function() {
	swal('Good Job', 'You clicked the button!', 'error');
});

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