 $(document).ready(function() {
            $('.viewBtn').click(function() {
                let ids = $(this).data('id');
                console.log(ids)
                $.get('/get/ComplaintDetails/' + ids, function(response) {
                    if (response.success) {
                        document.getElementById('detail1').innerHTML = response.detail['Complaint_ID'];
                        document.getElementById('detail2').innerHTML = response.detail['ComplaintDate'];
                        document.getElementById('detail3').innerHTML = response.detail['ComplaintType'];
                        document.getElementById('detail4').innerHTML = response.detail['ComplaintCategory'];
                        document.getElementById('detail5').innerHTML = response.detail['SubCategory'];
                        document.getElementById('detail6').innerHTML = response.detail['AuthDept'];
                        document.getElementById('detail7').innerHTML = response.detail['ComplaintNature'];
                        document.getElementById('detail8').innerHTML = response.detail['District'];
                        document.getElementById('detail9').innerHTML = response.detail['City'];
                        document.getElementById('detail10').innerHTML = response.detail['Pincode'];
                        document.getElementById('detail11').innerHTML = response.detail['ReferenceNo'];
                        document.getElementById('detail12').innerHTML = response.detail['ComplaintDetails'];
                    }
                });
            });
        });