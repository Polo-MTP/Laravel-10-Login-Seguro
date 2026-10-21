async function loadProfile() {
    const response = await fetch('/api/user', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    });

    const user = await response.json();

    if (response.ok) {
        document.getElementById('profileName').innerText = user.name;
        document.getElementById('profileEmail').innerText = user.email;
        
        const statusBadge = user.is_active
            ? '<span class="badge badge-success">Activa</span>'
            : '<span class="badge badge-error">Inactiva</span>';
        
        document.getElementById('profileStatus').innerHTML = statusBadge;
        
        const date = new Date(user.created_at);
        document.getElementById('profileCreated').innerText = date.toLocaleDateString('es-ES', { year: 'numeric', month: 'long', day: 'numeric' });
        
    } else {
        alert("No se pudo cargar el perfil.");
    }
}

loadProfile();
