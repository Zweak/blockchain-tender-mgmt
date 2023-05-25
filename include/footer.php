		<script src="assets/admin/js/jquery-3.3.1.min.js"></script>
		<script src="assets/admin/js/popper.min.js"></script>
		<script src="assets/admin/js/bootstrap.min.js"></script>
		<script src="assets/admin/js/main.js"></script>
		<script src="assets/admin/js/plugins/pace.min.js"></script>
		<script type="text/javascript" src="assets/admin/js/plugins/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
        <script src="assets/js/additional_methods.js"></script>
		<script type="text/javascript">
            $(document).ready(function(){
            	$('#sampleTable').DataTable();

                $("#profileForm").validate({
                    errorElement: 'small',
                    rules:{
                        company_name:{
                            required: true
                        },
                        company_email:{
                            required: true,
                            email: true
                        },
                        company_phone:{
                            required: true,
                            mobile: true
                        },
                        company_country:{
                            required: true
                        },
                        company_state:{
                            required: true
                        },
                        company_city:{
                            required: true
                        },
                        company_address:{
                            required: true
                        },
                        year: {
                            required: true  
                        }
                    },
                    messages:{
                        company_name:{
                            required: 'Please enter company name'
                        },
                        company_email:{
                            required: 'Please enter company email',
                            email: 'Please enter valid company email'
                        },
                        company_phone:{
                            required: 'Please enter company phone',
                            mobile: 'Phone is not valid'
                        },
                        company_country:{
                            required: 'Please enter company country'
                        },
                        company_state:{
                            required: 'Please enter company state'
                        },
                        company_city:{
                            required: 'Please enter company city'
                        },
                        company_address:{
                            required: 'Please enter company address'
                        },
                        year:{
                            required: 'Please enter year of experience'  
                        }
                    }
                });

                $("#tenderForm").validate({
                    errorElement: 'small',
                    rules:{
                        name:{
                            required: true
                        },
                        town:{
                            required: true
                        },
                        beneficiary_name:{
                            required: true
                        },
                        beneficiary_email:{
                            required: true
                        },
                        beneficiary_fax_id:{
                            required: true
                        },
                        tender_notice:{
                            required: true
                        },
                        open_date:{
                            required: true
                        },
                        close_date:{
                            required: true
                        },
                        estimated_cost:{
                            required: true
                        },
                        period:{
                            required: true
                        }
                    },
                    messages:{
                        name:{
                            required: '<i class="fa fa-warning"></i> Please enter project name'
                        },
                        town:{
                            required: '<i class="fa fa-warning"></i> Please enter town/country'
                        },
                        beneficiary_name:{
                            required: '<i class="fa fa-warning"></i> Please enter beneficiary name'
                        },
                        beneficiary_email:{
                            required: '<i class="fa fa-warning"></i> Please enter beneficiary email'
                        },
                        beneficiary_fax_id:{
                            required: '<i class="fa fa-warning"></i> Please enter beneficiary fax ID'
                        },
                        tender_notice:{
                            required: '<i class="fa fa-warning"></i> Please select date of tender notice'
                        },
                        open_date:{
                            required: '<i class="fa fa-warning"></i> Please select date of opening tenders'
                        },
                        close_date:{
                            required: '<i class="fa fa-warning"></i> Please select date of closing tenders'
                        },
                        estimated_cost:{
                            required: '<i class="fa fa-warning"></i> Please enter estimated cost'
                        },
                        period:{
                            required: '<i class="fa fa-warning"></i> Please enter implementation period'
                        }  
                    }
                });
            });
        </script>
	</body>
</html>