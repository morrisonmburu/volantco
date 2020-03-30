<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

                                <table style="overflow-x:auto;border-collapse: collapse; white-space: nowrap; " class="table table-bordered table-hover">
                                    <thead >
                                        <tr>
                                        	<th> ID </th>
                                            <th> Name </th>
                                            <th> Payment Type </th>
                                            <th> Address </th>
                                            <th> Phone-No </th>
                                            <th> Email </th>
                                            <th> Hire Date </th>
                                            <th> License Issuing State </th>
                                            <th> Expiry License alert </th>
                                            <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        @if($data)
							@foreach($data as $courier)
								<tr style="text-align: center;">
									<td>
										{{$courier->id}}
									</td>
									<td>
										{{$courier->firstName}} {{$courier->lastName}}
									</td>
									<td>
										{{$courier->paymentType}}
									</td>
									<td>
										{{$courier->city}}, {{$courier->county}}
									</td>
									<td>
										{{$courier->phoneNo}}
									</td>
									<td>
										{{$courier->email}}
									</td>
									<td>
										{{$courier->hireDate}}
									</td>
									<td>
										{{$courier->licenseIssuingState}}
									</td>
									<td>
							@if(\Carbon\Carbon::parse($courier->licenseExpiryDate)->lt(\Carbon\Carbon::now()))
							        <div class="label-success label label-danger">Time to renew</div>
							@else
							        <div class="label-success label label-success">Good</div>
							@endif
									</td>
									<td>
										@if(\Carbon\Carbon::parse($courier->licenseExpiryDate)->lt(\Carbon\Carbon::now()))
											<span class="label-success label label-danger">
												Inactive
											</span>
										@else
											<span class="label-success label label-default">
												Active
											</span>
										@endif
									</td>
								</tr>
							@endforeach
						@else
							<tr style="text-align: center;">
									
							</tr>
						@endif
                                   
                        </tbody>
                    </table>
</body>
</html>