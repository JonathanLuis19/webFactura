import { data } from "autoprefixer";

export class search{
    constructor(myurlp, mysearchp, ul_add_lip){
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_li = ul_add_lip;
        this.idli = "mylista";
        this.pcantidad = document.querySelector('#pcantidad');
    }

    InputSearch(){
        this.mysearch.addEventListener( "input", (e) =>{
            e.preventDefault(e);
            try {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                console.log(valor);
            } catch (error) {
                console.log(error);
            }
        });
    }
    
}