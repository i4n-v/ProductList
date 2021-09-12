const closeValidate = () => document.querySelector('.validate').remove();

const togleDropdown = () =>{ 
    let dropdown = document.querySelector('#dropdown');

    if(dropdown.style.display == 'block'){
        dropdown.style.display = 'none';
    }else{
        dropdown.style.display = 'block';
    }
}