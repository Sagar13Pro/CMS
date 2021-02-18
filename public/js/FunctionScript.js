let DisplayList = document.getElementById("ListPopOn");
let Passwords = document.getElementById("PasswordShow");
let Cpassword = document.getElementById("CpasswordShow");
let MatchData = document.getElementById("MatchPass");
let LowerCase = document.querySelector(".lower-case i");
let UpperCase = document.querySelector(".upper-case i");
let Digits = document.querySelector(".number-digits i");
let SpecialChar = document.querySelector(".special-characters i");
let _Atleast  = document.querySelector(".AtLeast-Eight i");
let state = false;

function FocusItem() {
    DisplayList.style.display = "block";
}
function RemoveItem() {
    DisplayList.style.display = "none";
}

function ShowPasswd() {
    let passlength = document.getElementById('PasswordShow').value;
    if(passlength.length > 0){
        if (state) {
            Passwords.setAttribute("type", "password");
            state = false;
        } else {
            Passwords.setAttribute("type", "text");
            state = true;
        }
    }
}
function ShowCpasswd() {
    let cpasslength = document.getElementById('CpasswordShow').value;
    if(cpasslength.length > 0){
        if (state) {
            Cpassword.setAttribute("type", "password");
            state = false;
        } else {
            Cpassword.setAttribute("type", "text");
            state = true;
        }
    }
}

function MatchPasswd(){
    let pass = document.getElementById("PasswordShow").value;
    let Cpass = document.getElementById("CpasswordShow").value;
    //console.log(pass.length);

    if(pass.length != 0){
        if(pass == Cpass){
            MatchData.innerHTML = "Matched";
            MatchData.classList.add('alert-success');
            MatchData.classList.remove('alert-danger');
            MatchData.classList.remove("alert-info");
        }else{
            MatchData.innerHTML = "Not Matched";
            MatchData.classList.add('alert-danger');
            MatchData.classList.remove('alert-success');
            MatchData.classList.remove("alert-info");
        }
    }else{
        MatchData.innerHTML = "Please First provide Password in above Field";
        MatchData.classList.add("alert-info");
        MatchData.classList.remove("alert-success");
        MatchData.classList.remove("alert-danger");
    }
}

Passwords.addEventListener("keyup",function(){
    let Passwd = document.getElementById('PasswordShow').value;
    ValidatePasswd(Passwd);
});
function ValidatePasswd(Passwd){
    
    if(Passwd.match(/[a-z]/g))
    {
        LowerCase.classList.remove('fa-circle-notch');
        LowerCase.classList.add('fa-check-circle');
    }
    if(Passwd.match(/[A-Z]/g))
    {
        UpperCase.classList.remove('fa-circle-notch');
        UpperCase.classList.add('fa-check-circle');
    }
    if(Passwd.match(/[1-9]/g))
    {
        Digits.classList.remove('fa-circle-notch');
        Digits.classList.add('fa-check-circle');
    }
    if(Passwd.match(/[!$%@#^&*]/g))
    {
        SpecialChar.classList.remove('fa-circle-notch');
        SpecialChar.classList.add('fa-check-circle');
    }
    if(Passwd.length >= 8)
    {
        _Atleast.classList.remove('fa-circle-notch');
        _Atleast.classList.add('fa-check-circle');
    }
}