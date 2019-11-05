const mysql = require('mysql');
const express = require('express');
const app = express();
const bodyParser = require('body-parser');
var cors = require('cors');

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
var connection = mysql.createConnection({
    host: '127.0.0.1',
    port: '3306',
    host: "localhost",
    user: "nazar304_superadmin",
    password: "dogfactory123",
    database: "nazar304_dogfactory"
});

app.post('/addclient', function (req, res) {
    var client = req.body;
    connection.query('INSERT INTO clients SET ?', client, function (err, result) {
        if (err) throw err;
        res.send(JSON.stringify(result.insertId));
    });
});

app.get('/getitems', function (req, res) {
    connection.query("SELECT * FROM items", function (err, result) {
        if (err) throw err;
        res.send(result);
    });
});

app.get('/getsearchitems/:search', function (req, res) {
    var search = req.params.search;
    connection.query(`SELECT * FROM items WHERE name LIKE '%${search}%'`, function (err, result) {
        if (err) throw err;
        res.send(result);
    });
});

app.get("/getitem/:id", function (req, res) {
    var id = req.params.id;
    connection.query(`SELECT * FROM items WHERE id=${id}`, function (err, result) {
        if (err) throw err;
        res.send(result);
    });
});

app.get("/getitemimage/:imageid", function (req, res) {
    var id = req.params.imageid;
    connection.query(`SELECT * FROM item_images WHERE item_id=${id} LIMIT 1`, function (err, result) {
        if (err) throw err;
        connection.query(`SELECT * FROM images WHERE id=${result[0].image_id} LIMIT 1`, function (err, result) {
            if (err) throw err;
            res.send(JSON.stringify(result[0].url));
        });
    });
});

app.listen(3333, function () {
    console.log('Example app listening on port 3333!');
});