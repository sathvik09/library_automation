console.log(1);
let it_no = document.querySelectorAll('.options')

function render_order(data){
    $.ajax({
        url: 'cafeteria_server.php',
        data: data,
        success : function(data){   
          data_json = JSON.parse(data);  
          html='';
          for(let i=0;i<data_json.length;i++){
              data_val = data_json[i];
              html += `<p style="margin-left:500px;margin-top:30px;color:red;font-size:20px">${data_val.message}</p>`;
          }
          $("#para").html(html);
        }
              
      });
}

it_no.forEach(e=>{
    e.addEventListener('click',()=>{
        let qty = prompt("enter quantity");
        console.log(e.id);
        data = {
            "itm_no":e.id,
            "quantity":qty
        }
        render_order(data);
    })
})