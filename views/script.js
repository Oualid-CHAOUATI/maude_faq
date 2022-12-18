class DeleteNationalityHandler{
    constructor(){
        this.deleteAnchors = document.querySelectorAll(".delete-anchor");

        this.deleteAnchors.forEach(a=>a.addEventListener("click",()=>{
            this.toggleModal();
            this.setNationalityToDelete(a);
        }))

        this.modal=document.querySelector("#modal-wrapper");
        this.modalCancellBtn=this.modal.querySelector("#cancell-btn");
        this.modalCancellBtn.addEventListener("click",()=>{
            this.toggleModal();
        })
        this.modalConfirmDeleteBtn=this.modal.querySelector("#confirm-delete-btn");
        this.modalNationalityWrapper=this.modal.querySelector("#label-wrapper");
        this.deleteBaseURL=this.modalConfirmDeleteBtn.getAttribute("href");
    }

    toggleModal(){
        this.modal.classList.toggle("show");
    }
    setNationalityToDelete(anchor){
        this.nationalityNumber = anchor.getAttribute("data-nationality-number");
        this.nationalityLabel = anchor.getAttribute("data-nationality-label");
        this.modalNationalityWrapper.innerHTML=this.nationalityLabel;

        this.modalConfirmDeleteBtn.setAttribute("href",this.deleteBaseURL+this.nationalityNumber);
    }

}


    
new  DeleteNationalityHandler();



const closePopUpBtns=document.querySelectorAll(".close-pop-up-btn");
closePopUpBtns.forEach(btn=>btn.addEventListener("click",()=>{
    document.querySelector("#"+btn.getAttribute("data-parent-id")).remove();
}))