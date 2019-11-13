<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if !mso]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->

    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700);
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
    * {
      font-family: 'Open Sans', sans-serif;
    }
    </style>

	<!--[if gte mso 15]>
	<style type="text/css">
		table { font-size:1px; line-height:0; mso-margin-top-alt:1px;mso-line-height-rule: exactly; }
		* { mso-line-height-rule: exactly; }
	</style>
	<![endif]-->

</head>
<body style="; margin:0; padding:0; min-width: 100%; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">



	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
	      <tbody><tr>
	          <td style="border-collapse:collapse;padding:15px;color:#ffffff">
	              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
	                  <tbody><tr>
	                      <td style="border-collapse:collapse;padding:30px;color:#ffffff;font-family:sans-serif;font-size:24px;font-weight:bold;text-align:center;background-color:#2b87f1">
	                          Purchase Order Created
	                      </td>
	                  </tr>
	              </tbody></table>
	          </td>
	      </tr>
	  </tbody>
	</table>

	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
    <tbody>
				<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
              PURCHASE ORDER NUMBER:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">
              EM-{{ $creatPO->id }} <a href="https://express-merchants.co.uk/public/po-edit/{{ $creatPO->id }}"><img src="https://express-merchants.co.uk/public/images/add-pod_icon.svg" alt="View PO Details"></a>	
          </td>
      </tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
						USER:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">


						{{ $poUser->name }}

				</td>
			</tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
						COMPANY:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">

					{{ $poCompany->companyName }}


				</td>
			</tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
						ORDER PURPOSE:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">
						{{ $creatPO->poPurpose }}
				</td>
			</tr>


      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
              SUPPLIER TYPE:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">
              {{ $creatPO->poType }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
              SELECTED MERCHANT:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c!important;text-decoration:none;font-family:sans-serif;font-size:16px;font-weight:bold">

						@if ($creatPOmechant)
						{{ $creatPOmechant->merchantName }}, {{ $creatPOmechant->merchantAddress1 }}, {{ $creatPOmechant->merchantCounty }}, {{ $creatPOmechant->merchantPostcode }}
						@else
						{{ $creatPOinputmechant }}
						@endif


          </td>
      </tr>
			<tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
              P/O Value:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;padding:15px 0">
              {{ $creatPO->poValue }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px 0">
              TASK/PROJECT NUMBER:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;padding:15px 0">
              {{ $creatPO->poProject }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:19px;padding:15px 0">
              JOB LOCATION:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:19px;font-weight:bold;padding:15px 0">
              {{ $creatPO->poProjectLocation }}
          </td>
      </tr>
  </tbody>
</table>


<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
    <tbody>
			<tr>
        <td style="border-collapse:collapse;padding:15px;color:#0b0c0c;font-family:sans-serif;font-size:16px;line-height:20px">
            <address style="font-style:normal">
                <abbr title="Express Merchants">EM</abbr> <br />
                Unit 34, Brownstown Busines Cen,<br  />
								Brownstown Road<br  />
								Portadown<br  />
								BT62 4EA
            </address>
        </td>
      </tr>
  </tbody>
</table>

</body>
</html>
