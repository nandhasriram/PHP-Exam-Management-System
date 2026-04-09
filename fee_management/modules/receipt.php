<script>
function printTable() {
    var table = document.getElementById('feeTable');
    var rows = table.getElementsByTagName('tbody')[0].rows;

    if (rows.length === 0) {
        alert('No data available to print.');
        return;
    }

    var groupedReceipts = {};
    Array.from(rows).forEach(row => {
        var studentName = row.cells[2].innerText;
        if (!groupedReceipts[studentName]) {
            groupedReceipts[studentName] = [];
        }
        groupedReceipts[studentName].push(row);
    });

    for (const [studentName, matchingRows] of Object.entries(groupedReceipts)) {
        var receiptContent = `
            <div style="width: 400px; font-family: Arial, sans-serif; margin: auto; text-align: center; border: 1px solid black; padding: 20px;">
                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 10px;">
                    <img src="logo.png" style="width: 40px; height: 40px; margin-right: 10px;" alt="College Logo">
                    <h2 style="margin: 0;">Your College Name</h2>
                </div>
                <p>Address of the College, City, Zip Code</p>
                <h3 style="margin: 20px 0; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">Student Fee Receipt</h3>
                <table style="width: 100%; font-size: 14px; margin-bottom: 10px; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left; width: 50%;">Student Name:</td>
                        <td style="text-align: right;">${studentName}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Receipt Date:</td>
                        <td style="text-align: right;">${new Date().toLocaleDateString()}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Fee Receipt No:</td>
                        <td style="text-align: right;">${matchingRows[0].cells[1].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Class:</td>
                        <td style="text-align: right;">${matchingRows[0].cells[3].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Section:</td>
                        <td style="text-align: right;">${matchingRows[0].cells[4].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Year:</td>
                        <td style="text-align: right;">${matchingRows[0].cells[5].innerText}</td>
                    </tr>
                </table>
                <table style="width: 100%; font-size: 14px; margin-top: 10px; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">
                    <tr>
                        <td style="text-align: left;"><strong>Particulars</strong></td>
                        <td style="text-align: right;"><strong>Amount</strong></td>
                    </tr>`;

        matchingRows.forEach(matchRow => {
            receiptContent += `
                <tr>
                    <td style="text-align: left;">${matchRow.cells[6].innerText}</td>
                    <td style="text-align: right;">${matchRow.cells[7].innerText}</td>
                </tr>`;
        });

        receiptContent += `
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Total Due Amount</td>
                    <td style="text-align: right;">${matchingRows[0].cells[8].innerText}</td>
                </tr>
            </table>
            <p style="margin-top: 10px; text-align: left;">Cashier Sign:</p>
        </div>`;

        var originalContent = document.body.innerHTML;
        document.body.innerHTML = receiptContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
}
</script>