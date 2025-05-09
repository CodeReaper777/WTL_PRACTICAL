<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>
    
    <!-- Root template -->
    <xsl:template match="/">
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    background-color: #f9f9f9;
                }
                h2, h3 {
                    color: #333;
                }
                table {
                    width: 80%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    border: 1px solid #ccc;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                ul {
                    list-style-type: disc;
                    padding-left: 20px;
                }
                li {
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <h2>Employee Details</h2>
            
            <!-- Select and Display All Employees -->
            <h3>All Employees:</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Salary</th>
                </tr>
                <xsl:for-each select="employees/employee">
                    <tr>
                        <td><xsl:value-of select="@id"/></td>
                        <td><xsl:value-of select="name"/></td>
                        <td><xsl:value-of select="designation"/></td>
                        <td><xsl:value-of select="salary"/></td>
                    </tr>
                </xsl:for-each>
            </table>

            <!-- Filtering: Employees with Salary > 50,000 -->
            <h3>High-Salary Employees (Salary > 50,000):</h3>
            <ul>
                <xsl:for-each select="employees/employee[salary > 50000]">
                    <li>
                        <xsl:value-of select="name"/> - <xsl:value-of select="salary"/>
                    </li>
                </xsl:for-each>
            </ul>

            <!-- Sorting Employees by Salary (Descending Order) -->
            <h3>Employees Sorted by Salary (High to Low):</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Salary</th>
                </tr>
                <xsl:for-each select="employees/employee">
                    <xsl:sort select="salary" data-type="number" order="descending"/>
                    <tr>
                        <td><xsl:value-of select="name"/></td>
                        <td><xsl:value-of select="salary"/></td>
                    </tr>
                </xsl:for-each>
            </table>

        </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
