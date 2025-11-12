// Function to load the navbar from the external file

async function loadNavbar() {

    const response = await fetch('/tools/menu.html');

    const navbarHtml = await response.text();

    document.getElementById('navbar-placeholder').innerHTML = navbarHtml;

}



// Function to test a request to the database via a PHP request

async function testDB() {

    const selectedTable = 'TeamInfo';

    const selectedField = 'Number';

    const selectedValue = '21';



    const testResp = await fetch(`/components/sql/fetch_db.php?table=${selectedTable}&field=${selectedField}&value=${selectedValue}`);

    console.log('Testing db - team 21:', testResp)

}



//***************

// Page Configuration and Execution

//****************

async function loadStart() {

    await loadNavbar();

    await testDB();

    await fetchTableList();

}

window.onload = loadStart;



// Fetch and populate the table dropdown

async function fetchTableList() {

    try {

        const response = await fetch('/components/sql/fetch_db_table_names.php');

        const data = await response.json();



        const tableSelector = document.getElementById('tableSelector');

        data.forEach(table => {

            const option = document.createElement('option');

            option.value = table;

            option.textContent = table;

            tableSelector.appendChild(option);

        });

    } catch (error) {

        console.error('Error fetching table list:', error);

    }

}



// Fetch columns (fields) for the selected table

async function fetchFieldList(table) {

    try {

        const response = await fetch(`/components/sql/fetch_db.php?table=${table}&getFields=true`);

        const data = await response.json();



        const fieldSelector = document.getElementById('fieldSelector');

        fieldSelector.innerHTML = '<option value="">-- Choose a Field --</option>';



        if (data && data.fields) {

            data.fields.forEach(field => {

                const option = document.createElement('option');

                option.value = field;

                option.textContent = field;

                fieldSelector.appendChild(option);

            });

        } else {

            console.error('No fields found for table:', table);

        }

    } catch (error) {

        console.error('Error fetching field list:', error);

    }

}



// Display columns and first row of the selected table

async function displaySelectedTable() {

    const selectedTable = document.getElementById('tableSelector').value;



    if (selectedTable) {

        await fetchFieldList(selectedTable);



        try {

            const response = await fetch(`/components/sql/fetch_db.php?table=${selectedTable}`);

            if (!response.ok) throw new Error('Network response was not ok');



            const data = await response.json();

            console.log('Fetched Data:', data, "Selected Table", selectedTable);



            if (data[selectedTable]) {

                const tableData = data[selectedTable];

                if (tableData && tableData.columns && tableData.firstRow) {

                    displayTableData(tableData.columns, tableData.firstRow);

                } else {

                    console.warn('Invalid data structure for table:', selectedTable);

                    dumpRawData(data);

                }

            } else {

                console.error('Data for selected table not found:', selectedTable);

                alert('Error: Data for the selected table was not found.');

            }

        } catch (error) {

            console.error('Error fetching table data:', error);

        }

    } else {

        document.getElementById('tableDisplay').innerHTML = '';

        document.getElementById('fieldSelector').innerHTML = '<option value="">-- Choose a Field --</option>';

    }

}



// Fetch and display rows based on selected field and input value

async function fetchRowByField() {

    const selectedTable = document.getElementById('tableSelector').value;

    const selectedField = document.getElementById('fieldSelector').value;

    const fieldValue = document.getElementById('fieldValue').value;



    if (!selectedTable || !selectedField || !fieldValue) {

        alert('Please select a table, a field, and enter a value.');

        return;

    }



    console.log('Requesting: ',selectedTable, selectedField, fieldValue )



    try {

        const response = await fetch(`/components/sql/fetch_db.php?table=${selectedTable}&field=${selectedField}&value=${fieldValue}`);

        const data = await response.json();



        console.log('Received: ',data )



        if (data && data.rows && data.columns) {

            displayTableData(data.columns, data.rows[0] || {}); // Display the first matching row

        } else {

            console.error('No data found for the selected field and value');

            alert('No results found for your query.');

        }

    } catch (error) {

        console.error('Error fetching row by field and value:', error);

    }

}



// Display data in single-column format

function displayTableData(columns, rowData) {

    const container = document.getElementById('tableDisplay');

    container.innerHTML = '';



    if (Array.isArray(columns) && typeof rowData === 'object') {

        columns.forEach(column => {

            const row = document.createElement('div');

            row.classList.add('row');



            const columnDiv = document.createElement('div');

            columnDiv.classList.add('col-6');

            columnDiv.textContent = column;



            const valueDiv = document.createElement('div');

            valueDiv.classList.add('col-6');

            valueDiv.textContent = rowData[column] || 'N/A';



            row.appendChild(columnDiv);

            row.appendChild(valueDiv);

            container.appendChild(row);

        });

    } else {

        console.error('Invalid columns or rowData format', columns, rowData);

        alert('Error: Invalid columns or row data format.');

    }

}



// Dump raw data if the structure is invalid

function dumpRawData(data) {

    const container = document.getElementById('tableDisplay');

    container.innerHTML = '';



    if (Array.isArray(data)) {

        data.forEach(item => {

            const row = document.createElement('div');

            row.classList.add('row');

            row.textContent = JSON.stringify(item);

            container.appendChild(row);

        });

    } else if (typeof data === 'object') {

        Object.keys(data).forEach(key => {

            const row = document.createElement('div');

            row.classList.add('row');

            row.textContent = `${key}: ${JSON.stringify(data[key])}`;

            container.appendChild(row);

        });

    } else {

        const row = document.createElement('div');

        row.classList.add('row');

        row.textContent = JSON.stringify(data);

        container.appendChild(row);

    }

}

