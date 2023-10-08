<head>
    <style>
        body {
            background-color: #080710;
            /* min-height: 100vh; */
        }

        .background {
            width: 100%;
            height: 100%;
            overflow: hidden;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .background .shape {
            position: absolute;
            border-radius: 50%;
            height: 240px;
            width: 240px;
        }

        .shape:first-child {
            background: linear-gradient(90deg, rgba(238, 174, 202, 1) 0%, rgba(223, 233, 148, 1) 100%);
            left: -50px;
            top: -50px;
        }

        .background .shape:nth-child(2) {
            background: linear-gradient(90deg, rgb(76, 247, 76) 0%, rgb(233, 148, 229) 100%);
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            animation: move 10s linear infinite;
            /* border-radius: 20% !important; */
        }

        @keyframes move {
            0% {
                left: 35%;
                top: 35%;
                transform: rotate(72deg);
            }

            25% {
                left: 55%;
                top: 55%;
                transform: rotate(144deg);
                transform: scale(0.1);
            }

            50% {
                left: 55%;
                top: 35%;
                transform: scale(0.5);
                transform: rotate(216deg);
            }

            75% {
                left: 35%;
                top: 55%;
                transform: rotate(288deg);
                transform: scale(0.1);
            }

            100% {
                left: 35%;
                top: 35%;
                transform: rotate(360deg);
            }
        }

        .shape:last-child {
            background: linear-gradient(to right, #43c6ac, #f8ffae);
            right: -25px;
            bottom: -60px;
        }
    </style>
</head>