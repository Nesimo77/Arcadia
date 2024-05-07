document.getElementById("loginForm").addEventListener("submit", function(event){
    event.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur de connexion');
        }
        return response.json();
    })
    .then(data => {
        if(data.success) {
            window.location.href = "src/dashboard.php";
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
});
