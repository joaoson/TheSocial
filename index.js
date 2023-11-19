let inputs = Array.from(document.getElementsByTagName("input"));

console.log(inputs)

inputs.forEach(element => {
    element.addEventListener("focusout",()=>{
        validateText(element)
    })
    element.addEventListener("keypress",(event)=>{
        mask(element,event)
    })
});

let password = document.getElementById("password")
let passwordConfirm = document.getElementById("password2")

async function validateText(text){
    if(text.classList[0] == "teste"){
        return
    }
    let value = text.value
    let check = /\/?\-?\.?\(?\)?\-?\s?/g
    if(text.classList[0] != "email" && text.classList[0] != "password"){
        for(let i = 0;i<value.match(check).length;i++){
            value = value.replace(check,"");
        }
    }
    
    let regex =  await returnRegex(text.classList[0])
        
    if(!regex.test(value) || value == ""){
        text.classList.add("error");
    }
    else{
        text.classList.remove("error");
    }
    if(text == password2 && password.value != password2.value){
        text.classList.add("error");
    }
    
}

function mask(text,event){
    switch(text.classList[0]){


        case "text":
            break

        case "telefone":
            if(text.value.length ==0){
                text.value = text.value + "("
            }
            else if(text.value.length ==3){
                text.value = text.value + ")" +" "
            }
            else if(text.value.length ==10){
                text.value = text.value + "-"
            }
            else if(text.value[text.value.length-1] == ")" || text.value[text.value.length-1] == "(" || text.value[text.value.length-1] == " "){
                text.value = text.value.substring(0,text.value.length-1)
            }
            break
    

        case "cpf":
            if(text.value.length ==3 || text.value.length ==7){
                text.value = text.value + "."
            }
            else if(text.value.length == 11){
                text.value = text.value + "-"
            }
            else if(text.value.length == 4 || text.value.length == 8 || text.value.length == 11){
                text.value = text.value.substring(0,text.value.length-1)
            }
            break
        case "date":
            if(text.value.length ==2 || text.value.length ==5){
                text.value = text.value + "/"
            }
            else if(text.value[text.value.length-1] == "/"){
                text.value = text.value.substring(0,text.value.length-1)
            }
            break
        case "cep":
            if(text.value.length ==2){
                text.value = text.value + "."
            }
            else if(text.value.length == 6){
                text.value = text.value + "-"
            }
            else if(text.value.length == 3 || text.value.length == 7){
                text.value = text.value.substring(0,text.value.length-1)
            }
            break
        case "state":
            text.value = text.value.toUpperCase()
            break
        default:
            break
    }
}

function returnRegex(text){
    switch(text){
        case "text":
            return /^[a-zA-Z]*$/;
        case "number":
            return /\d/;
        case "date":
            return /^\d{6,8}$/
        case "cpf":
            return /^\d{11}$/
        case "cep":
            return /^\d{8}$/
        case "email":
            return /^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-z]+$/;
        case "state":
            return /^\w\w$/;
        case "telefone":
            return /^\d*$/;
        case "password":
            return /^[A-Za-z\d@$!%*?]{8,}$/;
        default:
            return /\w/;
    }
}

let submitButton = document.getElementById("submit")

submitButton.addEventListener("click",(event)=>{
    let pass = 0
    inputs.forEach(element => {
        if(element.classList[1]=="error"){
            event.preventDefault();
            pass+=1
        }
        else{
            pass -=1
        }
    });
    if(pass <= -8){
        alert("Sucesso")
    }
    else{
        alert("Nao passou")
    }
})

let button = Array.from(document.getElementsByClassName("button"))
console.log(button)

let x = 0
button.forEach(element => {
    element.addEventListener("click",()=>{
        x++
        console.log(element.parentElement)
        element.parentElement.classList.add("missing")
        let [counter, setCounter] = useState(x);
        console.log(counter())
        let num1 = document.getElementById("numero1")
        let num2 = document.getElementById("numero2")
        let num3 = document.getElementById("numero3")
        let num4 = document.getElementById("numero4")

        if(counter() == 1){
            num2.classList.add("active")
            num1.classList.remove("active")
        }
        else if(counter() == 2){
            num3.classList.add("active")
            num2.classList.remove("active")
        }
        else if(counter() == 3){
            num4.classList.add("active")
            num3.classList.remove("active")
        }
    })
});

function useState(defaultValue) {
    let value = defaultValue
  
    function getValue() {
      return value
    }
  
    function setValue(newValue) {
      value = newValue
    }
  
    return [getValue, setValue];
  }
  
  let [counter, setCounter] = useState(0);

  console.log(counter())
  let botao1 = document.getElementById("button1")

  let check1 = setInterval(() => {
    console.log("OI")
    if((inputs[0].value!="" && inputs[1].value!="" && inputs[2].value!="")&&!(inputs[0].classList[1]=="error" || inputs[1].classList[1]=="error" || inputs[2].classList[1]=="error")){
        botao1.classList.remove("desativado")
        botao1.disabled = false
    }
    else{
        botao1.classList.add("desativado")
        botao1.disabled = true
    }
  }, 200);

  let botao2 = document.getElementById("button2")

  setInterval(() => {
    if((inputs[3].value!="" && inputs[4].value!="" && inputs[5].value!="")&&!(inputs[3].classList[1]=="error" || inputs[4].classList[1]=="error" || inputs[5].classList[1]=="error")){
        botao2.classList.remove("desativado")
        botao2.disabled = false
    }
    else{
        botao2.classList.add("desativado")
        botao2.disabled = true
    }
  }, 200);

  let botao3 = document.getElementById("button3")

  setInterval(() => {
    if((inputs[6].value!="" && inputs[7].value!="" && inputs[8].value!="")&&!(inputs[6].classList[1]=="error" || inputs[7].classList[1]=="error" || inputs[8].classList[1]=="error")){
        botao3.classList.remove("desativado")
        botao3.disabled = false
    }
    else{
        botao3.classList.add("desativado")
        botao3.disabled = true
    }
  }, 200);


  const form = document.getElementById('formulario');
  form.addEventListener('keypress', (e)=> {
    if (e.keyCode === 13) {
      e.preventDefault();
    }
  });