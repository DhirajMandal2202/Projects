<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        /* border: 1px solid #ddd; */
        border-collapse: collapse;
        width: 100%;
        height: 100%;
    }

    td,
    th,
    tr {
        /* white-space: nowrap; */
        border: 1px solid black;
        padding: 10px;
    }
</style>

<body>

    <div>
        <table>
            <caption>Dayla table</caption>
            <thead>
                <tr>
                    <th colspan="3" rowspan="2" id="image"><img src="<?php echo FETCH_IMAGE; ?>dayla.png" height="40" ></th>
                    <th colspan="5" rowspan="2">PRICE LIST WITH SUPPLIER</th>
                    <th colspan="1" rowspan="1">Tool Card No :</th>
                </tr>
                <tr>
                    <th colspan="1">Date :- 18.1.23</th>
                </tr>
                <tr>
                    <th colspan="2">REAR MT OP 20</th>

                    <th colspan="1"></th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                    <th colspan="1"></th>
                </tr>
                <tr>
                    <th colspan="1">SR.NO</th>
                    <th colspan="1">TOOL NAME</th>
                    <th colspan="1">SUPPLIER</th>
                    <th colspan="1">PRICE</th>
                    <th colspan="1">DRAWING </th>
                    <th colspan="1">PROD. STOCK</th>
                    <th colspan="1">TOOL CRIB STOCK</th>
                    <th colspan="1">RE-ORDER </th>
                    <th colspan="1">REMARK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>

            <tfoot>
                <tr>
                    <th colspan="3"></th>
                    <th colspan="3"></th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th style="text-align: right" colspan="9">LS-PRD-004,REV-01.</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>