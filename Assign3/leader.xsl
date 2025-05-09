<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Group</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .member { border: 5px solid #000; padding: 10px; margin: 10px; }
                    .leader { font-weight: bold; color: blue; }
                    .memberss { font-style: italic; color: green; }
                </style>
            </head>
            <body>
                <h1 style="font-size:5em">TEAM CRUD!!!!</h1>
                <xsl:for-each select="members/member">
                    <div class="member">
                        <div class="leader"><xsl:value-of select="leader"/></div>
                        <div class="memberss"> <xsl:value-of    select="memberss"/></div>
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
