function openEditModal(nis) {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editForm').action = `/admin/pages/siswa/${nis}`;
    
    // Update fetch URL to use NIS
    fetch(`/admin/pages/siswa/${nis}/edit`)
        .then(response => response.json())
        .then(data => {
            const murid = data.murid;
            
            // Populate form fields with existing data
            // ... rest of the code remains the same ...
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data siswa');
        });
} 