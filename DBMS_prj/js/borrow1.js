let a = document.querySelectorAll('.issues'); 
function render(x){
    data = {
      "name" : x,
    }
     $.ajax({
       url: 'test.php',
       data: data,
       success : function(data){
         data1 = JSON.parse(data);
         console.log(data);
         
       }
     });
    }
  
  
  for(let i=0;i<a.length;i++){
      a[i].addEventListener('click',e=>{
          let x = a[i].id;
          render(x);
      })
  }