const closeValidate = () => document.querySelector('.validate').remove();

function togleDropdown(){ 
    let dropdown = document.querySelector('#dropdown');

    if(dropdown.style.display == 'block'){
        dropdown.style.display = 'none';
    }else{
        dropdown.style.display = 'block';
    }
}

function togleModalDelete(id){ 
    let modal = document.querySelector('.modal-delete');

    if(modal.style.display == 'flex'){
        modal.style.display = 'none';
    }else{
        modal.style.display = 'flex';
        let link = document.querySelector('#url');
        link.href=`../actions/delete-product.php?product=${id}`;
    }
}