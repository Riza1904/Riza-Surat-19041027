//sweetalert
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire({
		title: "Congretulation!",
		text: flashData,
		type: "success",
	});
}

const flashDataGagal = $(".flash-data-gagal").data("flashdatagagal");

if (flashDataGagal) {
	Swal.fire({
		title: "Oops!",
		text: flashDataGagal,
		type: "error",
	});
}

$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	Swal.fire({
		title: "Apakah anda yakin",
		text: "",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

//image name aktif
$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

$(function () {
	$(".tombol-laporan-surat-kaluar").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getsuratkeluarajax",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
		});
	});
	$(".tombol-laporan-surat-masuk").on("click", function () {
		var tgl_awal = $("#tgl_awal").val();
		var tgl_akhir = $("#tgl_akhir").val();
		$("#dataTable").dataTable({
			processing: true,
			serverSide: true,
			ordering: true,
			paging: false,
			destroy: true,
			info: false,
			searching: false,
			ajax: {
				url: "getsuratmasukajax",
				data: {
					tgl_awal: tgl_awal,
					tgl_akhir: tgl_akhir,
				},
				method: "post",
				dataType: "json",
			},
		});
	});
});
