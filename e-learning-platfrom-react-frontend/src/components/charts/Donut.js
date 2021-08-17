import {
  Chart,
  ChartTitle,
  ChartLegend,
  ChartSeries,
  ChartSeriesItem,
  exportVisual,
  ChartTooltip,
  ChartSeriesLabels,
} from "@progress/kendo-react-charts";
import { exportPDF } from "@progress/kendo-drawing";
import { saveAs } from "@progress/kendo-file-saver";
import React, {useState,useEffect,useRef} from "react";
import { COLORS } from "./colors";
import axios from "axios";



const renderTooltip = context => {
  const { category, value } = context.point || context;
  return (
    <div>
      {category}: {value}%
    </div>
  );
};



// Show category label for each item in the donut graph
const labelContent = e => e.category;

const Donut = props => {
const [studentCount, setStudentCount] = useState(0)
const [courseCount, setCourseCount] = useState(0)
const [loading, setLoading] = useState(true);
  useEffect(() => {
  const loadCount = () => axios.get('http://localhost:8000/api/admin')
    .then(response => {
      console.log(response);
      setStudentCount(response.data.students);
      setCourseCount(response.data.courses);
      setLoading(false);
    });
  loadCount();
  }, [])
  // Graph data
const applicationsStatusThisMonth = [
  {
    status: "Courses",
    value: courseCount,
    color: COLORS.courses,
  },
  {
    status: "Students",
    value: studentCount ,
    color: COLORS.students,
  }
  ];
    // Store reference to the Kendo <Chart> component
  const chartRef = useRef(null);
	
  // Create a PDF and download it
    const onPDFExportClick = async () => {
        const chartVisual = exportVisual(chartRef.current);
        if (!chartVisual) return;
        const dataURI = await exportPDF(chartVisual, {
            paperSize: "A4",
            landscape: true,
        });
        await saveAs(dataURI, "donut-chart.pdf");
    }

  return (
    <React.Fragment>
    <button className="btn btn-primary" onClick={onPDFExportClick}>Export as PDF</button>
      <Chart ref={cmp => (chartRef.current = cmp)}>
      <ChartTitle text="Total User Ratio" />
      <ChartLegend visible={false} />
      <ChartTooltip render={renderTooltip} />
      <ChartSeries>
        <ChartSeriesItem
          type="donut"
          data={applicationsStatusThisMonth}
          categoryField="status"
          field="value"
        >
          <ChartSeriesLabels
            color="#fff"
            background="none"
            content={labelContent}
          />
        </ChartSeriesItem>
      </ChartSeries>
      </Chart>
      </React.Fragment>
  );
};

export default Donut;