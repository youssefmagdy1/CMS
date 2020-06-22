$(document).ready(function(){
    $('#selectAllPosts').click(function(event){
        if(this.checked){
            $('.checkboxs').each(function(){
                this.checked = true ;
            });
        }
        else{
            $('.checkboxs').each(function(){
                this.checked = false ;
            });
        }

    });
});