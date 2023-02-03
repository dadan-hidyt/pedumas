function line(chartData,app)
	{
		const data =
		{
			labels: chartData.data_pengaduan.months,
			datasets: [{
				label: 'Pengaduan Masuk',
				backgroundColor: "green",
				borderColor: "green",
				data: chartData.data_pengaduan.semua_pengaduan,
				borderWidth: 1,
				tension: 0.4,
			}]
		};

		const config =
		{
			type: 'line',
			data: data,
			options:
			{
				scales: { y: { beginAtZero: true } },
				plugins:
				{
					legend: { position: 'bottom', },
					title:
					{
						display: true,
						text: `Statistik pengaduan ${chartData.priode}`
					}
				}
			}
		};

		var myChart = new Chart(app.canvasContext, config);
	}