<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--[if !mso]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->

</head>
<body style="margin:0; padding:0; min-width: 100%;">

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
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Purchase Order Number:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase">
              <a href="https://express-merchants.co.uk/public/po-edit/{{ $creatPO->id }}">EM-{{ $creatPO->id }}</a>
          </td>
      </tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
						User:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">


						{{ $poUser->name }}

				</td>
			</tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
						Company:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">

					{{ $poCompany->companyName }}


				</td>
			</tr>

			<tr style="border-top:1px solid #bfc1c3;border-bottom:1px solid #bfc1c3">
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
						Order Purpose:
				</td>
				<td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">
						{{ $creatPO->poPurpose }}
				</td>
			</tr>


      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Supplier Typre:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">
              {{ $creatPO->poType }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Selected Merchant:
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
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Purchase Order Value:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">
              {{ $creatPO->poValue }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Tash/Project Number:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">
              {{ $creatPO->poProject }}
          </td>
      </tr>
      <tr style="border-bottom:1px solid #bfc1c3">
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;padding:15px">
              Job Location:
          </td>
          <td style="border-collapse:collapse;color:#0b0c0c;font-family:sans-serif;font-size:16px;font-weight:bold;">
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
