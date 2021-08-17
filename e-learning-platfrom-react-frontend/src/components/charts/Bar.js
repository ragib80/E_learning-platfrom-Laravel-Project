import {
  Chart,
  ChartTitle,
  ChartLegend,
  ChartSeries,
  ChartSeriesItem,
  ChartCategoryAxis,
  ChartCategoryAxisTitle,
  ChartCategoryAxisItem,
  exportVisual,
} from "@progress/kendo-react-charts";
import { exportPDF } from "@progress/kendo-drawing";
import { saveAs } from "@progress/kendo-file-saver";
import React, {useState,useEffect,useRef} from "react";
import { COLORS } from "./colors";
import axios from "axios";


const seriesLabels = {
    visible: true,
    padding: 3,
    font: "normal 16px Arial, sans-serif",
    position: "center",
};

const Bar = props => {
const [courses, setCourse] = useState([])
const [courseCount, setCourseCount] = useState(0)
const [loading, setLoading] = useState(true);

      useEffect(() => {
  const loadCount = () => axios.get('http://localhost:8000/api/admin/course/list')
    .then(response => {
        console.log(response);
        setCourse(response.data.courses);
        setCourseCount(response.data.courses);
        setLoading(false);
        console.log(response.data.courses);
    });
  loadCount();
      }, [])
    const course = courses.map((course) => {return course.c_name });
    const enrolled = courses.map((course) => {return course.enrolled });
        // Graph data
const series = [
  {
    status: "Enrollment",
    data: enrolled,
    color: COLORS.enrolled,
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
        await saveAs(dataURI, "bar-chart.pdf");
    }

  return (
  <div>
      <button className="btn btn-primary" onClick={onPDFExportClick}>Export as PDF</button>
      <Chart ref={cmp => (chartRef.current = cmp)} pannable zoomable>
      <ChartTitle text="Course Enrollment So Far" />
      <ChartLegend visible={true} />
      <ChartCategoryAxis>
        <ChartCategoryAxisItem categories={course}>
          <ChartCategoryAxisTitle text="Course" />
        </ChartCategoryAxisItem>
      </ChartCategoryAxis>
      <ChartSeries>
        {series.map((item, idx) => (
          <ChartSeriesItem
            key={idx}
            type="bar"
            gap={10}
            spacing={0.25}
            labels={seriesLabels}
            data={item.data}
            name={item.status}
            color={item.color}
          />
        ))}
      </ChartSeries>
          </Chart>
    </div>
  );
};

export default Bar;