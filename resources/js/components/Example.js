import React from 'react';
import ReactDOM from 'react-dom';
import Draggable from 'react-draggable';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faQuestionCircle } from '@fortawesome/free-solid-svg-icons';

class App extends React.Component {

  render() {
    const stepStyle = {
      backgroundColor: "#000000",
      color: "#ffffff",
      borderRadius: "100px",
      width: "150px",
      height: "150px",
    };

    const iconStyle = {
      color: "#ffffff",
      fontSize: "300%",
      margin: "50px",
    };

    const icon = <FontAwesomeIcon style={iconStyle} icon={faQuestionCircle} />

    return (
      <Draggable
        handle=".step"
        defaultPosition={{x: 0, y: 0}}
        position={null}
        grid={[25, 25]}
        scale={1}
        onStart={this.handleStart}
        onDrag={this.handleDrag}
        onStop={this.handleStop}>
        <div>
          <div className="step" style={stepStyle}>
            {icon}
          </div>
        </div>
      </Draggable>
    );
  }
}

ReactDOM.render(<App/>, document.getElementById('example'));
