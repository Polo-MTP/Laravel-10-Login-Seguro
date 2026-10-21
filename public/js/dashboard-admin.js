let currentPage = 1;

async function fetchUserData() {
    const response = await fetch('/api/user', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    });

    const data = await response.json();

    if (response.ok) {
        if (!data.role || data.role.name !== 'Administrador') {
            alert('Intruso detectado. Tu nivel de acceso no es de Administrador.');
            window.location.href = '/dashboard';
            return;
        }

        document.getElementById('welcomeMessage').innerText = `Administración: ${data.name}`;
    } else {
        alert("Acceso denegado: " + (data.message || "No se pudieron obtener los datos."));
        window.location.href = '/login';
    }
}

async function fetchHistoricalData(page = 1) {
    document.getElementById('auditTableBody').innerHTML = '<tr><td colspan="4" class="td-empty">Cargando...</td></tr>';
    
    const response = await fetch(`/api/admin/historical-data?page=${page}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    });

    const json = await response.json();
    const tbody = document.getElementById('auditTableBody');

    if (response.ok && json.success) {
        tbody.innerHTML = ''; 
        
        const records = json.data.data;
        const meta = json.data;
        
        if(records.length === 0) {
            tbody.innerHTML = '<tr><td colspan="4" class="td-empty">No hay registros.</td></tr>';
            document.getElementById('paginationInfo').innerText = '';
            return;
        }

        records.forEach(log => {
            const date = new Date(log.created_at).toLocaleString('es-ES');
            const userName = log.user ? `${log.user.name}<br><span class="td-muted">${log.user.email}</span>` : 'Desconocido';

            let statusBadge = '';
            const lowerStatus = log.status ? log.status.toLowerCase() : '';
            if(lowerStatus.includes('success')) {
                statusBadge = '<span class="badge badge-success">Exitoso</span>';
            } else if(lowerStatus.includes('failed')) {
                statusBadge = '<span class="badge badge-error">Fallido</span>';
            } else if(lowerStatus.includes('locked')) {
                statusBadge = '<span class="badge badge-warning">Bloqueado</span>';
            } else {
                statusBadge = `<span class="badge badge-neutral">${log.status}</span>`;
            }

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${date}</td>
                <td>${userName}</td>
                <td class="td-mono">${log.ip_address}</td>
                <td>${statusBadge}</td>
            `;
            tbody.appendChild(tr);
        });

        document.getElementById('paginationInfo').innerText = `Página ${meta.current_page} de ${meta.last_page} (Total: ${meta.total})`;
        
        const btnPrev = document.getElementById('btnPrevPage');
        const btnNext = document.getElementById('btnNextPage');
        
        btnPrev.disabled = meta.current_page === 1;
        btnNext.disabled = meta.current_page === meta.last_page;

        const newBtnPrev = btnPrev.cloneNode(true);
        const newBtnNext = btnNext.cloneNode(true);
        btnPrev.parentNode.replaceChild(newBtnPrev, btnPrev);
        btnNext.parentNode.replaceChild(newBtnNext, btnNext);

        newBtnPrev.addEventListener('click', () => {
            if (meta.current_page > 1) fetchHistoricalData(meta.current_page - 1);
        });
        
        newBtnNext.addEventListener('click', () => {
            if (meta.current_page < meta.last_page) fetchHistoricalData(meta.current_page + 1);
        });

    } else {
        tbody.innerHTML = '<tr><td colspan="4" style="padding: 20px; text-align:center; color:#ef4444;">Error cargando datos.</td></tr>';
    }
}

fetchUserData();
fetchHistoricalData();
