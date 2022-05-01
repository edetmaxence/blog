/**
 * Suppression d'article modal Bootstrap
 */
console.log("bte");
const btnDelete =document.querySelectorAll('btnDelete');
btnDelete.forEach(btn => {
    btn.addEventListener('click',(event) =>{
        event.preventDefault();
  
   
    
        const modalDelte= document.querySelector('.btnDeleteModal') ;
        modalDelte.href = btn.href;
        //recupere l'attribu jref

    



        
        const myModal = new bootstrap.Modal(document.querySelector('#modalDelete'));
        myModal.show(); 
    
    });


});