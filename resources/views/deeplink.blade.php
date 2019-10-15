<!DOCTYPE html>
<html>
<head>
    <title>Открыть в Instagram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      #link {
          height: 100vh;
          width: 100vw;
          display: grid;
          animation-duration: 0.2s;
          animation-delay: 2s;
          animation-name: bg;
          animation-fill-mode: forwards;
      }

      @keyframes  bg {
        from {
          background-color: #f9f9f9;
        }

        to {
          background-color: #979797;
        }
      }

      .alert {
          width: 80%;
          align-self: center;
          justify-self: center;
          background-color: #f9f9f9;
          border-radius: 10px;
          font-size: 16px;
          text-align: center;
          opacity: 0;
          animation-duration: 0.2s;
          animation-delay: 2s;
          animation-name: popup;
          animation-fill-mode: forwards;
      }

      @keyframes  popup {
        from {
          transform: scale(2);
              opacity: 0;
        }

        to {
          transform: scale(1);
              opacity: 1;
        }
      }

      .alert__title {
          padding: 25px 0;
          color: #333;
          font-size: 16px;
      }

      .alert__line {
          width: 100%;
          height: 2px;
          background-color: #ededed;
      }

      .alert__button {
          padding: 15px 0;
          color: #3d84cd;
          font-weight: 500;
      }

      @import  url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap&subset=cyrillic');

      @font-face {
          font-family:'Open Sans';
          src:url("../fonts/OpenSans-Regular/OpenSans-Regular.eot") format("embedded-opentype"),
          url("../fonts/OpenSans-Regular/OpenSans-Regular.woff") format("woff"),
          url("../fonts/OpenSans-Regular/OpenSans-Regular.ttf") format("truetype");
          font-style:normal;
          font-weight:400
      }

      @font-face {
          font-family:'Open Sans';
          src:url("../fonts/OpenSans-SemiBold/OpenSans-SemiBold.eot") format("embedded-opentype"),
          url("../fonts/OpenSans-SemiBold/OpenSans-SemiBold.woff") format("woff"),
          url("../fonts/OpenSans-SemiBold/OpenSans-SemiBold.ttf") format("truetype");
          font-style:normal;
          font-weight:600
      }

      @font-face {
          font-family:'Open Sans';
          src:url("../fonts/OpenSans-Bold/OpenSans-Bold.eot") format("embedded-opentype"),
          url("../fonts/OpenSans-Bold/OpenSans-Bold.woff") format("woff"),
          url("../fonts/OpenSans-Bold/OpenSans-Bold.ttf") format("truetype");
          font-style:normal;
          font-weight:700
      }

      * {
          margin: 0;
          padding: 0;
          border: 0;
          outline: 0;
          font-size: 100%;
          vertical-align: baseline;
          background: transparent;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
      }

      *::before,
      *::after {
       -webkit-box-sizing:border-box;
       box-sizing:border-box
      }

      @-ms-viewport {
          width:device-width
         }

         body {
          font-family:'Open Sans', sans-serif;
          font-weight:600;
          line-height:1;
          color:#202020;
          overflow-x:hidden;
          background-color:#fafafa
         }

         a,
         a:hover,
         a:focus,
         a:active,
         button,
         button:hover,
         button:focus,
         button:active,
         input,
         input:hover,
         input:focus,
         textarea {
          text-decoration:none;
          outline:none;
          font-family:'Open Sans', sans-serif
         }

      #link {
          height: 100vh;
          width: 100vw;
          display: grid;
          animation-duration: 0.2s;
          animation-delay: 2s;
          animation-name: bg;
          animation-fill-mode: forwards;
      }

      .alert {
          width: 80%;
          align-self: center;
          justify-self: center;
          background-color: #f9f9f9;
          border-radius: 10px;
          font-size: 16px;
          text-align: center;
          opacity: 0;
          animation-duration: 0.2s;
          animation-delay: 2s;
          animation-name: popup;
          animation-fill-mode: forwards;
          box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.35);
          -webkit-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.35);
          -moz-box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.35);
      }

      .alert__title {
          padding: 25px 0;
          color: #333;
          font-size: 16px;
      }

      .alert__line {
          width: 100%;
          height: 2px;
          background-color: #ededed;
      }

      .alert__button {
          padding: 15px 0;
          color: #3d84cd;
          font-weight: 500;
      }
  </style>
</head>
<body>
 <a id="link" href="{{$link_url}}">
		<div class="alert">
        	<div class="alert__title">
    			Открыть в Instagram
            </div>
            <div class="alert__line"></div>
            <div class="alert__button">
                Продолжить
            </div>
        </div>
        </a>
</body>
</html>
