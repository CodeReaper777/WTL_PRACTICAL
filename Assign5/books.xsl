<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Book List</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .book { border: 5px solid #000; padding: 10px; margin: 10px; }
                    .title { font-weight: bold; color: blue; }
                    .author { font-style: italic; color: green; }
                </style>
            </head>
            <body>
                <h1>Book List</h1>
                <xsl:for-each select="books/book">
                    <div class="book">
                        <div class="title"><xsl:value-of select="title"/></div>
                        <div class="author">by <xsl:value-of select="author"/></div>
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
