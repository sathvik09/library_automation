function doc(){
    let a=document.querySelectorAll(".returns");
    for(let i=0;i<a.length;i++){
        a[i].addEventListener('click',e1=>{
            let x=a[i].id;
            render(x);
        })
    };



    function render(x){
        data1={
            "isbn_return":x
        }

        $.ajax({
            url: 'mybooks_server.php',
            data: data1,
            success : function(data){
                console.log(data);
            }
        })
    }

}