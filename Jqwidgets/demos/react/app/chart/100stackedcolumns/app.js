import React from 'react';
import ReactDOM from 'react-dom';

import JqxChart from '../../../jqwidgets-react/react_jqxchart.js';

class App extends React.Component {
    render() {
        let sampleData = [
            { Day: 'Monday', Running: 30, Swimming: 5, Cycling: 25, Riding: 10 },
            { Day: 'Tuesday', Running: 25, Swimming: 25, Cycling: 0, Riding: 15 },
            { Day: 'Wednesday', Running: 30, Swimming: 5, Cycling: 25, Riding: 25 },
            { Day: 'Thursday', Running: 35, Swimming: 25, Cycling: 45, Riding: 15 },
            { Day: 'Friday', Running: 5, Swimming: 20, Cycling: 25, Riding: 5 },
            { Day: 'Saturday', Running: 30, Swimming: 0, Cycling: 30, Riding: 30 },
            { Day: 'Sunday', Running: 60, Swimming: 45, Cycling: 5, Riding: 20 }
        ];

        let padding = { left: 5, top: 5, right: 5, bottom: 5 };

        let titlePadding = { left: 90, top: 0, right: 0, bottom: 10 };

        let xAxis =
            {
                dataField: 'Day',
                tickMarks: {
                    visible: true,
                    interval: 1,
                    color: '#BCBCBC'
                },
                gridLines: {
                    visible: true,
                    interval: 1,
                    color: '#BCBCBC'
                },
                axisSize: 'auto'
            };

        let valueAxis =
            {
                unitInterval: 10,
                title: { text: 'Time in minutes' },
                tickMarks: { color: '#BCBCBC' },
                gridLines: { color: '#BCBCBC' },
                labels: {
                    horizontalAlignment: 'right',
                    formatSettings: { sufix: '%' }
                }
            };

        let seriesGroups =
            [
                {
                    type: 'stackedcolumn100',
                    columnsGapPercent: 100,
                    seriesGapPercent: 5,
                    series: [
                        { dataField: 'Running', displayText: 'Running' },
                        { dataField: 'Swimming', displayText: 'Swimming' },
                        { dataField: 'Cycling', displayText: 'Cycling' }
                    ]
                }
            ];
        return (
            <JqxChart style={{ width: 850, height: 500 }}
                title={'Fitness & exercise weekly scorecard'} description={'Time spent in vigorous exercise by activity'}
                showLegend={true} enableAnimations={true} padding={padding}
                titlePadding={titlePadding} source={sampleData} xAxis={xAxis}
                valueAxis={valueAxis} colorScheme={'scheme04'} seriesGroups={seriesGroups}
            />
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'));
