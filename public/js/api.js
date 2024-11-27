document.addEventListener('DOMContentLoaded', function () {
    // Llenar la tabla con datos de la API
    fetch('/api/provinces')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('provinceTableBody');
            tableBody.innerHTML = ''; // Limpiar tabla antes de llenarla
            data.forEach(province => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${province.id}</td>
                    <td>${province.name}</td>
                    <td>${new Date(province.created_at).toLocaleString()}</td>
                    <td>${new Date(province.updated_at).toLocaleString()}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm edit-btn" data-id="${province.id}">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </a>
                        <button 
                            class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#confirmDeleteModal" 
                            data-id="${province.id}" 
                            data-name="${province.name}">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Manejo de la edición
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const provinceId = this.getAttribute('data-id');
                    const editRoute = `/provinces/edit/${provinceId}`; // Ruta de edición según Laravel
                    window.location.href = editRoute; // Redirige a la página de edición
                });
            });

            // Manejo de la eliminación
            const deleteButtons = document.querySelectorAll('[data-bs-target="#confirmDeleteModal"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const provinceId = this.getAttribute('data-id');
                    const provinceName = this.getAttribute('data-name');
                    const deleteForm = document.getElementById('deleteProvinceForm');
                    const provinceNameSpan = document.getElementById('provinceName');

                    // Ruta dinámica para la eliminación
                    deleteForm.action = `/api/provinces/${provinceId}`;
                    provinceNameSpan.textContent = provinceName;
                });
            });
        })
        .catch(error => {
            console.error('Error fetching provinces:', error);
        });
});

document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/districts')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('districtTableBody');
            tableBody.innerHTML = '';
            data.forEach(district => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${district.id}</td>
                    <td>${district.name}</td>
                    <td>${district.province.name}</td>
                    <td>${new Date(district.created_at).toLocaleString()}</td>
                    <td>${new Date(district.updated_at).toLocaleString()}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm edit-btn" data-id="${district.id}">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </a>

                        <button 
                            class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#confirmDeleteModal" 
                            data-id="${district.id}" 
                            data-name="${district.name}">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const districtId = this.getAttribute('data-id');
                    const editRoute = `/districts/edit/${districtId}`; // Genera la ruta de edición
                    window.location.href = editRoute;  // Redirige a la ruta de edición
                });
            });

            // Manejo de la eliminación
            const deleteButtons = document.querySelectorAll('[data-bs-target="#confirmDeleteModal"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const districtId = this.getAttribute('data-id');
                    const districtName = this.getAttribute('data-name');
                    const deleteForm = document.getElementById('deleteDistrictForm');
                    const districtNameSpan = document.getElementById('districtName');
                    deleteForm.action = `/api/districts/${districtId}`; 
                    districtNameSpan.textContent = districtName; 
                });
            });
        });
}); 

document.addEventListener('DOMContentLoaded', function () {
    fetch('/api/corregimientos')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('corregimientoTableBody');
            tableBody.innerHTML = '';
            data.forEach(corregimiento => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${corregimiento.id}</td>
                    <td>${corregimiento.name}</td>
                    <td>${corregimiento.district?.name || 'N/A'}</td>
                    <td>${corregimiento.district?.province?.name || 'N/A'}</td>
                    <td>${new Date(corregimiento.created_at).toLocaleString()}</td>
                    <td>${new Date(corregimiento.updated_at).toLocaleString()}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm edit-btn" data-id="${corregimiento.id}">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </a>

                        <button 
                            class="btn btn-danger btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#confirmDeleteModal" 
                            data-id="${corregimiento.id}" 
                            data-name="${corregimiento.name}">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Add edit functionality
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const corregimientoId = this.getAttribute('data-id');
                    const editRoute = `/corregimientos/edit/${corregimientoId}`; 
                    window.location.href = editRoute;
                });
            });

            // Add delete functionality
            const deleteButtons = document.querySelectorAll('[data-bs-target="#confirmDeleteModal"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const corregimientoId = this.getAttribute('data-id');
                    const corregimientoName = this.getAttribute('data-name');
                    const deleteForm = document.getElementById('deleteCorregimientoForm');
                    const corregimientoNameSpan = document.getElementById('corregimientoName');
                    deleteForm.action = `/api/corregimientos/${corregimientoId}`;
                    corregimientoNameSpan.textContent = corregimientoName;
                });
            });
        });
});