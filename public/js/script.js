// Confirmação de exclusão de usuário
document.addEventListener('DOMContentLoaded', function() {
    
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmation = confirm('Tem certeza que deseja excluir este usuário?');
            
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });

});
