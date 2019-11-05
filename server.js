var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'nazarmartyniuk2000@gmail.com',
        pass: '12345rez_Man54321'
    }
});

var mailOptions = {
    from: 'nazarmartyniuk2000@gmail.com',
    to: 'rezik013@ukr.net',
    subject: 'Volvobaza',
    text: 'That was easy!'
};

transporter.sendMail(mailOptions, function (error, info) {
    if (error) {
        console.log(error);
    } else {
        console.log('Email sent: ' + info.response);
    }
});