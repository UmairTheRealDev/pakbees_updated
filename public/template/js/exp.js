

function exportToExcel() {
    // Define column headings
    const headings = [
        'Column 1',
        'Column 2',
        'Column 3',
        // Add more headings as needed
    ];

    // Fetch your data (replace this with your actual data retrieval logic)
    const data = [
        "ali","sdjskdfn","sdfwsdf"
    ];

    // Create a new Excel workbook and add a worksheet
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.json_to_sheet([headings, ...data], { header: headings });

    // Add the worksheet to the workbook
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet 1');

    // Create a blob containing the workbook data
    const blob = XLSX.write(workbook, { bookType: 'xlsx', type: 'blob' });

    // Create a URL for the blob
    const url = window.URL.createObjectURL(blob);

    // Create a link element and trigger a click event to initiate the download
    const a = document.createElement('a');
    a.href = url;
    a.download = 'exported_data.xlsx';
    a.style.display = 'none';
    document.body.appendChild(a);
    a.click();

    // Clean up
    window.URL.revokeObjectURL(url);
    document.body.removeChild(a);
}
