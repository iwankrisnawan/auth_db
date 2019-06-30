$(document).ready(function(){

  $(function(){
    var getPage = 'Domain';
    var urlOri = 'http://localhost/domain_client/public/'+getPage;
    var data_id;

    function check_action_modal(action, data){
      if(action == 'update'){
        $('.form-control').each(function(e){
          let input_name = $(this).attr('name');
          $("[name='"+input_name+"']").val(data[input_name]);
        });
      }
      else if(action == 'insert'){
        $('.form-control').each(function(e){
          $(this).val('');
        });
      }
      else{
        return false;
      }
    }

    $(document).on('click','.showModalInsert', function(e){
      e.preventDefault();
      $('#formModalLable , .modal-footer a').html('Insert Data');
      $('.modal-footer a').attr('class','btn btn-primary insertButton'); // replace modalButton to insertButton

      check_action_modal('insert', '');
      $("[name='customer_id']").removeAttr('disabled');
      $("[name='db_name']").removeAttr('disabled');
      $("[name='db_user']").removeAttr('disabled');
      $("[name='db_password']").removeAttr('disabled');
    });
    $(document).on('click','.insertButton',function(e){
      e.preventDefault();
      $.ajax({
        url: urlOri+'/add',
        data: $('#modal_form').serialize(),
        method:'post',
        dataType:'json',
        success:function(data){
          console.log(data);
          location.reload();
        },
        error:function(){
          console.log('error');
        }
      });
    });

    $(document).on('click','.showModalEdit',function(e){
      e.preventDefault();
      $('#formModalLable , .modal-footer a').html('Edit Data');
      $('.modal-footer a').attr('class','btn btn-primary editButton'); // replace modalButton to editButton
      data_id = $(this).attr('data-id'); // ambil data-id
      $.ajax({
        url: urlOri+'/getdata',
        data:{idAjax : data_id},
        method:'post',
        dataType:'json',
        success:function(data){
          check_action_modal('update', data);
          $("[name='customer_id']").attr('disabled','disabled');
          $("[name='db_name']").attr('disabled','disabled');
          $("[name='db_user']").attr('disabled','disabled');
          $("[name='db_password']").attr('disabled','disabled');
        }
      });
    });
    $(document).on('click','.editButton',function(e){
      e.preventDefault();
      let data = 'id='+data_id+'&'+$('#modal_form').serialize();
      $.ajax({
        url: urlOri+'/edit',
        data: data,
        method:'post',
        dataType:'json',
        success:function(data){
          console.log(data);
          location.reload();
        },
        error:function(){
          console.log('gagal');
        }
      });
    });

    $(document).on('click','.delete_button',function(){
      let data = $(this).attr('data-id');
      $.ajax({
        url:urlOri+'/delete',
        data:{'id_data':data},
        method:'post',
        dataType:'json',
        success:function(data){
          console.log(data);
          location.reload();
        },
        error:function(){
          console.log('gagal');
        }
      })
    })

  });

});
