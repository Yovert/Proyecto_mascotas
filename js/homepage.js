let create = document.getElementById('Create');
let update = document.getElementById('UpdateC');
let remove = document.getElementById('Remove');
let check_in = document.getElementById('check_in');
let block_update = document.getElementById('update_pet');
let block_delete = document.getElementById('delete_pet');

create.addEventListener('click', () => {
    check_in.style.display = 'flex';
    check_in.style.justifyContent = 'center';
    block_update.style.display = 'none';
    block_delete.style.display = 'none';
})
update.addEventListener('click', () => {
    check_in.style.display = 'none';
    block_update.style.display = 'flex';
    block_update.style.justifyContent = 'center';
    block_delete.style.display = 'none';
})
remove.addEventListener('click', () => {
    block_delete.style.display = 'flex';
    check_in.style.display = 'none';
    block_update.style.display = 'none';
    block_delete.style.justifyContent = 'center';
})
