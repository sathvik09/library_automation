let ord = document.querySelectorAll('.orders')
function render_order(data){
    $.ajax({
        url: 'manager_server.php',
        data: data,
        success : function(data1){   
          console.log(data1);   
        }
              
      });
}

ord.forEach(e=>{
    e.addEventListener('click',()=>{
        data = {
            "itm_id":e.id
        }
        render_order(data);
    })
})
