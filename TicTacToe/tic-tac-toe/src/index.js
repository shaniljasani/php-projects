// Shanil Jasani - ssj742
// EE461L Lab4
// Part2 - TicTacToe

import React from 'react';
import ReactDOM from 'react-dom';
import './index.css'

// class Square extends React.Component {

//   render() {
//     return (
//       <button 
//         className="square" 
//         onClick={() =>{ this.props.onClick() }}
//       >
//         {this.props.value}
//       </button>
//     );
//   }
// }

// replaced Square class with function
function Square(props) {
// the square function returns a button with the value of the square in it
// on click it will use the props.onclick
  return (
    <button className="square" onClick={props.onClick}>
      {props.value}
    </button>
  );
}

// Board Class
class Board extends React.Component {
  // renderSquare gives us a square with an updated value and click function
  renderSquare(i) {
    return (
      <Square
        value={this.props.squares[i]}
        onClick={() => this.props.onClick(i)}
      />
    );
  }

  // rendering the board gives you all the 9 squares by calling rendersquare
  render() {
    return (
      <div>
        <div className="board-row">
          {this.renderSquare(0)}
          {this.renderSquare(1)}
          {this.renderSquare(2)}
        </div>
        <div className="board-row">
          {this.renderSquare(3)}
          {this.renderSquare(4)}
          {this.renderSquare(5)}
        </div>
        <div className="board-row">
          {this.renderSquare(6)}
          {this.renderSquare(7)}
          {this.renderSquare(8)}
        </div>
      </div>
    );
  }
}

// Game Class
class Game extends React.Component {

  // Constructor sets up the squares history, step number, and xIsNext flag
  constructor(props) {
    super(props);
    this.state = {
      history: [
        {
          squares: Array(9).fill(null)
        }
      ],
      stepNumber: 0,
      xIsNext: true
    };
  }

  // handles click on a square
  handleClick(i) {
    // add to history
    const history = this.state.history.slice(0, this.state.stepNumber + 1);
    const current = history[history.length - 1];
    const squares = current.squares.slice();
    // disable if already winner
    if (calculateWinner(squares) || squares[i]) {
      return;
    }
    // enters next x or o
    squares[i] = this.state.xIsNext ? "X" : "O";
    // concatenates to history
    this.setState({
      history: history.concat([
        {
          squares: squares
        }
      ]),
      stepNumber: history.length,
      xIsNext: !this.state.xIsNext
    });
  }

  // Jump function helps with time travel
  jumpTo(step) {
    this.setState({
      stepNumber: step,
      xIsNext: (step % 2) === 0
    });
  }

  // rendering Game
  render() {
    const history = this.state.history;
    const current = history[this.state.stepNumber];
    const winner = calculateWinner(current.squares);

    // creates list of moves/history
    const moves = history.map((step, move) => {
      const desc = move ?
        'Go to move #' + move :
        'Go to game start';
      return (
        <li key={move}>
          <button onClick={() => this.jumpTo(move)}>{desc}</button>
        </li>
      );
    });

    // Updates status of next player or winner title
    let status;
    if (winner) {
      status = "Winner: " + winner;
    } else {
      status = "Next player: " + (this.state.xIsNext ? "X" : "O");
    }

    // returns a gameboard
    return (
      <div className="game">
        <div className="game-board">
          <Board
            squares={current.squares}
            onClick={i => this.handleClick(i)}
          />
        </div>
        <div className="game-info">
          <div>{status}</div>
          <ol>{moves}</ol>
        </div>
      </div>
    );
  }
}

// ========================================

// React render game
ReactDOM.render(<Game />, document.getElementById("root"));


// Given Helper Function
function calculateWinner(squares) {
  const lines = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ];
  for (let i = 0; i < lines.length; i++) {
    const [a, b, c] = lines[i];
    if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
      return squares[a];
    }
  }
  return null;
}
