const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    let search_data = search.value.toLowerCase();  // Get the search value and make it lowercase
    let hasMatches = false;  // Flag to track if any match is found

    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase();
        
        // Toggle visibility based on search input
        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);

        // If a match is found, set the flag to true
        if (table_data.indexOf(search_data) >= 0) {
            hasMatches = true;
        }
    });

    // Adjust background color for visible rows
    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });

    // If no matches are found, show the "No results" message
    if (!hasMatches && search_data !== '') {
        showNoResultsMessage(search_data);
    } else {
        hideNoResultsMessage();
    }
}

// Function to show the "No results found" message
function showNoResultsMessage(searchTerm) {
    let messageContainer = document.getElementById('noResultsMessage');
    let searchTermElement = document.getElementById('searchTerm');
    
    searchTermElement.textContent = searchTerm;  // Display the search term in the message
    messageContainer.style.display = 'block';    // Show the message
}

// Function to hide the "No results found" message
function hideNoResultsMessage() {
    let messageContainer = document.getElementById('noResultsMessage');
    messageContainer.style.display = 'none';    // Hide the message if results are found
}


// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}
